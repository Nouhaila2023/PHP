package com.example.proyecto1spring.controller;

import com.example.proyecto1spring.entities.Task;
import com.example.proyecto1spring.services.TaskService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RestController;

import java.util.List;
import java.util.Optional;


@RestController
public class TaskController {

    @Autowired
    private TaskService taskService;


    @GetMapping("/tasks")
    public ResponseEntity<List<Task>> getAllTasks(){
        return ResponseEntity.ok(taskService.findAll());

    }


    @GetMapping("/tasks/{id}")
    public ResponseEntity<Task> getTaskById(Long id){
        Optional<Task> task = taskService.findById(id);

        if(task.isPresent()){
            return ResponseEntity.ok(task.get());
        }else {
            return ResponseEntity.notFound().build();
        }

    }


}
