package com.example.proyecto1spring.services;

import com.example.proyecto1spring.entities.Task;

import java.util.List;
import java.util.Optional;

public interface TaskService {


    List<Task> findAll();
    Optional<Task> findById(Long id);
    Optional<Task> findByTitle(String title);

    Task saveTask(Task task);

    void deleteTask(Long id);
    void deleteAll();
}
