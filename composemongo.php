 mongo:
    image: mongo
    restart: always
    environment:
      MONGO_INITDB_ROOT_USERNAME: arcadia2025
      MONGO_INITDB_ROOT_PASSWORD: test2025

 mongo-express:
    image: mongo-express
    restart: always
    ports:
      - 8081:8081
    environment:
      ME_CONFIG_MONGODB_ADMINUSERNAME: arcadia
      ME_CONFIG_MONGODB_ADMINPASSWORD: test2025
      ME_CONFIG_MONGODB_URL: mongodb+srv://arcadia2025:test2025@cluster0.5ayfjly.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0
      ME_CONFIG_BASICAUTH: false