Admin Panel Application
-----------------------

Run development server:
```
docker-compose run node-service /bin/sh -c 'cd default/ui/admin-app && npm run dev'
```
This should return result:
```
 VITE v5.2.11  ready in 353 ms

  ➜  Local:   http://localhost:3000/
  ➜  Network: http://172.26.0.2:3000/
  ➜  press h + enter to show help
```

Pick http://172.26.0.2:3000/ so see UI page

Node SSH:
```
docker-compose run node-service /bin/sh
```

NPM install example:
```
docker-compose run node-service /bin/sh -c 'cd default/ui/admin-app && npm install -D tailwindcss postcss autoprefixer'
docker-compose run node-service /bin/sh -c 'cd default/ui/admin-app && npx tailwindcss init -p'
```