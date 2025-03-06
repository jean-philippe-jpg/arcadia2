const express = require('express');
const route= express.Router();

route.get('/', (req, res) => {
    res.json({message: "voici les données"});
  });

  route.post('/', (req, res) => {
    
    res.json({message: req.body.message});
  });

  route.put('/:id', (req, res) => {
    res.json({message: `l'id ${req.params.id} a été modifié`});
    });

    route.delete('/:id', (req, res) => {

        res.json({message: `l'id ${req.params.id} a été supprimé`});
        }
        );

        route.patch("/like-post/:id", (req, res) => {
            res.json({message: `l'id ${req.params.id} a été liké`});
            });

            route.patch("/dislike-post/:id", (req, res) => {
                res.json({message: `post dislike ${req.params.id} a été liké`});
                });

 module.exports = route;