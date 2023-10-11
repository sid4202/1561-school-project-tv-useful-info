const http = require('http');
const fs = require('fs');

const server = http.createServer((req, res) => {
  if (req.method === 'POST') {
    let body = '';
    req.on('data', (chunk) => {
      body += chunk;
    });
    req.on('end', () => {
      
      const modifiedBody = body + '<p>Hello, World</p>';
      
      fs.readFile('index.html', 'utf8', (err, data) => {
        if (err) {
          console.error(err);
          res.statusCode = 500;
          res.end('Internal Server Error');
        } else {
    
          const modifiedHTML = data.replace('<body>', <body>${modifiedBody}</body>);
          
          // Отправляем модифицированный HTML файл в ответе
          res.setHeader('Content-Type', 'text/html');
          res.end(modifiedHTML);
        }
      });
    });
  } else {
    res.statusCode = 404;
    res.end('Not Found');
  }
});

const port = 3000;
server.listen(port, () => {
  console.log("Server running at http://localhost:${port}/");
});