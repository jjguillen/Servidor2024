const moment = require('moment');
const jwt = require('../services/jwt');

//Clave secreta para generar token
const SECRET_KEY = "halsdkfjopqiewrjAAAfdlfjlsfjJLLJLLHh4554";

function ensureAuth(req, res, next) {
    if (!req.headers.authorization) {
        return res.status(403).send({ msg: "No hay token de autorización"} );
    }

    //Recogemos el token y quitamos las comillas
    const token = req.headers.authorization.replace(/['"]+/g, "");

    const payload = jwt.decodeToken(token, SECRET_KEY);
    try {
         //Si ha expirado el token
        if (payload.exp <= moment().unix()) {
            return res.status(400).send({ msg: "El token ha expirado " });
        }
    } catch (error) {
        res.status(404).send({ msg: "Token inválido "} );
    }

    //Si llega aquí el token es válido y podrá ejecutar el endpoint
    req.user = payload;
    next();
}

module.exports = {
    ensureAuth,
}