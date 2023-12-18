const express = require("express");
const UserController = require("../controllers/user");
const api = express.Router();

//Rutas
api.post("/register", UserController.register); //Registrar usuario

module.exports = api;