const express = require("express");
const app = express();

//Configurar req para que lea json en el body
app.use(express.json());
app.use(express.urlencoded({extended: true}));

//Soluciona el problea de CORS.
//Permitir peticiones a la API desde ese dominio. Poner *, para atender peticiones desde cualquier punto.
app.use((req, res, next) => {
    res.setHeader("Access-Control-Allow-Origin", "*");
    res.setHeader("Access-Control-Allow-Methods", "GET, POST, DELETE, PUT");
    res.header(
      "Content-Type","Content-Length","Server","Date","Access-Control-Allow-Methods","Access-Control-Allow-Origin"
    );
    next();
  });
  
//Cargar rutas
const task_rutas = require("./routes/task");

//Rutas base
app.use("/api", task_rutas);

module.exports = app;

