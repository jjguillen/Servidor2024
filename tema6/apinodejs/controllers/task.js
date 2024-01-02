const Task = require("../models/task");

//Función para insertar una nueva tarea en MongoDB
async function createTask(req, res) {

    const task = new Task();
    const params = req.body;
    task.title = params.title;
    task.description = params.description;
    task.temas = params.temas;
    task.ataques = params.ataques;

    console.log

    try {
        const taskStore = await task.save();
        if (!taskStore) {
            res.status(400).send({msg: "Error en MongoDB"});
        } else {
            res.status(201).send({task : taskStore});
        }

    } catch (error) {
        res.status(500).send(error);
    }
}

async function getTasks(req, res) {
    console.log("Mostrar tareas");
    try {
      const tasks = await Task.find({ completed: false }).sort({ created_at: -1 });
      
      if (!tasks) {
        res.status(400).send({ msg: "Error recuperando tareas"});
      } else {
        res.status(200).send(tasks);
      }
    } catch (error) {
        res.status(500).send(error);
    }
}

async function getTask(req, res) {
    
    try {
      const id = req.params.id;

      const task = await Task.findById(id);
      
      if (!task) {
        res.status(400).send({ msg: "Error recuperando tarea"});
      } else {
        res.status(200).send(task);
      }
    } catch (error) {
        res.status(500).send(error);
    }
}

async function deleteTask(req, res) {
    
    try {
      const id = req.params.id;

      const task = await Task.findByIdAndDelete(id);
      
      if (!task) {
        res.status(400).send({ msg: "Error recuperando tarea"});
      } else {
        res.status(200).send(task);
      }
    } catch (error) {
        res.status(500).send(error);
    }
}

async function updateTask(req, res) {
  const id = req.params.id;
  const taskUp = req.body;

  try {

    const task = await Task.findByIdAndUpdate(id, taskUp);
    
    if (!task) {
      res.status(400).send({ msg: "Error modificando tarea"});
    } else {
      res.status(200).send(task);
    }
  } catch (error) {
      res.status(500).send(error);
  }
}


module.exports = {
    createTask, getTasks, getTask, deleteTask, updateTask
}