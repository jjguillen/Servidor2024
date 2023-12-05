const express = require("express");
const TaskController = require("../controllers/task");
const api = express.Router();

//Rutas
api.post("/task", TaskController.createTask);


module.exports = api;