const express = require("express");
const app = express();

//Cargar rutas
const hola_rutas = require("./routes/hola");

//Rutas base
app.use("/api", hola_rutas);

module.exports = app;

