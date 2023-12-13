const express = require("express");
const TaskController = require("../controllers/task");
const api = express.Router();

//Rutas
api.post("/task", TaskController.createTask);
api.get("/task", TaskController.getTasks);
api.get("/task/:id" , TaskController.getTask);
api.delete("/task/:id" , TaskController.deleteTask);

module.exports = api;