const express = require('express');
//const { setPosts } = require('../controllers/post.controllers');
const { setPosts } = require('../controllers/post.controllers');
const router = express.Router();


  router.post('/', setPosts);


   /* router.('/', (req, res) => {
      console.log(req.res);
    res.json({message: 'les données ont été modifiées'});
    });*/

   //router.put('/', (req, res) => {
    //res.json({message: 'les données ont été modifiées'});
    //});

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

 module.exports = router;