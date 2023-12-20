const User = require("../models/user");
const bcryptjs = require("bcryptjs");
const jwt = require("../services/jwt");

//Función para registrar un usuario
async function register(req, res) { 
    //Creamos el objeto usuario con los datos del body (Json con el user)
    const user = new User(req.body);

    try {
        if (!user.email) throw { msg: "El email es obligatorio" };
        if (!user.password) throw { msg: "El password es obligatorio" };

        //Ver si el email está ya registrado
        const foundEmail = await User.findOne({ email: user.email });
        if (foundEmail) throw { msg: "El email ya está en uso" };

        //Encriptar contraseña
        const salt = bcryptjs.genSaltSync(10);
        user.password = await bcryptjs.hash(user.password, salt);

        //Insertamos el usuario
        const userStore = await user.save();
        if (!userStore) {
            res.status(400).send({msg: "Error en MongoDB"});
        } else {
            res.status(201).send({user : userStore});
        }

    } catch (error) {
        res.status(500).send(error);
    }

}

async function login(req, res) {
    const { email, password } = req.body;

    try {
        //Busco el usuario con ese email en la BBDD
        const user = await User.findOne( { email: email });

        //Email no encontrado, error
        if (!user) throw { msg: "Error en login " };

        //Comprobamos que la contraseña sea igual que la de la BBDD
        const passwordSuccess = await bcryptjs.compare(password, user.password);
        if (!passwordSuccess) throw { msg: "Error en login" };

        res.status(200).send({ token: jwt.createToken(user, "12h") });

    } catch (error) {
        res.status(500).send(error);
    }
}

module.exports = {
    register, login
}