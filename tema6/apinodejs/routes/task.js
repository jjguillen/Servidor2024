const express = require("express");
const TaskController = require("../controllers/task");
const api = express.Router();
const md_token = require("../middlewares/authenticated");

//Rutas
api.post("/task", [md_token.ensureAuth], TaskController.createTask); //Insertar
api.get("/task", [md_token.ensureAuth], TaskController.getTasks);
api.get("/task/:id" , [md_token.ensureAuth], TaskController.getTask);
api.delete("/task/:id" , [md_token.ensureAuth], TaskController.deleteTask); //Borrar
api.put("/task/:id" , [md_token.ensureAuth], TaskController.updateTask); //Modificar

//api.put("/pokemon/:id/ataque/:pa")
module.exports = api;