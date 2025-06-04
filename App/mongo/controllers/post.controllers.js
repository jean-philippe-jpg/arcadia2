const PostModel = require('../models/post.models');


// Create a new post
module.exports.setPosts = async (req, res) => {

   if(!req.body.message) {
       return res.status(400).json({message: "Tous les champs sont requis"});

   }
   
};