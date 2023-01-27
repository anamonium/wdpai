const addTaskInput = document.querySelector('input[placeholder = "Task content"]');
const addTaskButton = document.querySelector("#taInput");

let checkButtons = document.querySelectorAll(".fa-square");
const chB = document.querySelectorAll(".fa-square-check");
const deleteButton = document.querySelectorAll(".fa-trash");

const taskContainer = document.querySelector(".chCon");

const allTasksNumber = document.querySelector("#allTasks");
const completedTaskContainer = document.querySelector("#tasksCompleted");

function addTask(){

    const description = addTaskInput.value;

    if(description) {

        fetch("/addTask", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(description)
        }).then(function (response) {
            return response.json();
        }).then(function (Task) {
            createTask(Task, description);
            allTasksNumber.innerHTML = parseInt(allTasksNumber.innerHTML) + 1;
            addTaskInput.value = "";
        });
    }

}

function changeStatus() {
    const status = this;
    const container = status.parentElement.parentElement;
    const id = container.getAttribute("id");

    fetch(`/updateTaskStatus/${id}`)
        .then(function (){
            if(status.className === "fas fa-square") {
                status.className = "fas fa-square-check"
                completedTaskContainer.innerHTML = parseInt(completedTaskContainer.innerHTML) + 1;
            }else{
                status.className = "fas fa-square"
                completedTaskContainer.innerHTML = parseInt(completedTaskContainer.innerHTML) - 1;
            }
        });
}


function deleteTask() {

    const task = this;
    const container = task.parentElement.parentElement;
    const id = container.getAttribute("id");
    const status = container.childNodes.item(1);
    fetch(`/deleteTask/${id}`)
        .then(function (){
            container.remove();
            allTasksNumber.innerHTML = parseInt(allTasksNumber.innerHTML) - 1;
            if(status.className === "fa-square-check")
                completedTaskContainer.innerHTML =  parseInt(completedTaskContainer.innerHTML) - 1;
        });

}

function createTask(task_id, desc){
    const template = document.querySelector("#task-template");
    const clone = template.content.cloneNode(true);
    const div = clone.querySelector("div");

    div.id = task_id;

    const icon = clone.querySelector("#status");

    icon.className = "fas fa-square";
    icon.addEventListener("click", changeStatus);

    const con = clone.querySelector(".taskContent");
    con.innerHTML = desc;

    clone.querySelector(".fa-trash").addEventListener("click", deleteTask);

    taskContainer.appendChild(clone);
}

checkButtons.forEach(button => button.addEventListener("click", changeStatus));
chB.forEach(button => button.addEventListener("click", changeStatus));
deleteButton.forEach(button => button.addEventListener("click", deleteTask));
addTaskButton.addEventListener("click", addTask);





