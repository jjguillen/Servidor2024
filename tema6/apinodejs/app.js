const express = require("express");
const app = express();

//Configurar req para que lea json en el body
app.use(express.json());
app.use(express.urlencoded({extended: true}));

//Cargar rutas
const task_rutas = require("./routes/task");

//Rutas base
app.use("/api", task_rutas);

module.exports = app;

