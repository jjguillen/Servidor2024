const Task = require("../models/task");

//Función para insertar una nueva tarea en MongoDB
async function createTask(req, res) {

    const task = new Task();
    const params = req.body;
    task.title = params.title;
    task.description = params.description;

    try {
        const taskStore = await task.save();
        if (!taskStore) {
            res.status(400).send({msg: "Error en MongoDB"});
        } else {
            res.status(200).send({task : taskStore});
        }

    } catch (error) {
        res.status(500).send(error);
    }
}


module.exports = {
    createTask,
}