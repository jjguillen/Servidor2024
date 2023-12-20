//JSon Web Token
const jwt = require('jsonwebtoken');

//Clave secreta para generar token
const SECRET_KEY = "halsdkfjopqiewrjAAAfdlfjlsfjJLLJLLHh4554";

function createToken(user, expiresIn) {
    const {id, email} = user;
    const payload = { id, email }; //Esto es lo que metemos en el token (no meter nunca passwords, se podría luego ver)

    //Generar token a partir del id y del email, con la fecha de expiración
    return jwt.sign(payload, SECRET_KEY, {expiresIn} );
}

function decodeToken(token) { 
    return jwt.decode(token, SECRET_KEY);
};

module.exports = {
    createToken, decodeToken
};