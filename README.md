# Site de Armazenamento de Anais da Estácio referente ao curso de Análise e Desenvolvimento de Sistemas

<p>Criação do banco de dados no mysql, execute esse comando</p>

```sql
-- Crie uma Database sistema login
CREATE DATABASE sistema_login;


-- Copie e cole esse comando no console do phpmyadmin na database criada
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);
```
