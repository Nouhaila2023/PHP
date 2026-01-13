package com.example.proyecto1spring.entities;

import jakarta.persistence.*;
import lombok.*;

import java.time.LocalDate;

@Entity(name = "tasks")
@AllArgsConstructor
@NoArgsConstructor
@Setter
@Getter
@ToString


public class Task {

        @Id
        @GeneratedValue(strategy = GenerationType.IDENTITY) //Autoin
        private Integer id;

        //me falta algo en la linia 24
        @Column(nullable = false)
        private String title;

        private String description;

        @Column(nullable = false, name = "fins_Date")
        private LocalDate finisDate;


}
