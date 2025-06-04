const express = require('express');
const { setPosts } = require('../controllers/post.controllers');

const router= express.Router();

router.get('/', (req, res) => {
    res.json({message: "voici les données"});
  });

  router.post('/', setPosts);

  router.put('/:id', (req, res) => {
    res.json({message: `l'id ${req.params.id} a été modifié`});
    });

    router.delete('/:id', (req, res) => {

        res.json({message: `l'id ${req.params.id} a été supprimé`});
        }
        );

        router.patch("/like-post/:id", (req, res) => {
            res.json({message: `l'id ${req.params.id} a été liké`});
            });

            router.patch("/dislike-post/:id", (req, res) => {
                res.json({message: `post dislike ${req.params.id} a été liké`});
                });

 module.exports = route;