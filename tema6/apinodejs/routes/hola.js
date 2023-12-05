const express = require("express");
const HelloController = require("../controllers/hola");
const api = express.Router();

//Rutas
api.get("/hola", HelloController.getHola);


module.exports = api;