const PostModel = require('../models/post.models');


// Create a new post
module.exports.setPosts = async (req, res) => {

   if(!req.body.message) {
       return res.status(400).json({message: "Tous les champs sont requis"});

   }
   

   const post = await PostModel.create({
         message: req.body.message,
         content: req.body.content
    })

    res.status(201).json({
        message: "Post créé avec succès",
        post
    });
};


