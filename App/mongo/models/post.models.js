const mongoose = require('mongoose');

const postSchema = mongoose.Schema(
    
    {
     message: {
        type: String,
        required: true,
        
    },
    content: {
        type: String,
        required: true,
        
    },

    likers :{
        type: [string],
       
    }
}

);


module.exports = mongoose.model('post', postSchema);