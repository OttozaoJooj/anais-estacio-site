# Anais Estácio
<p>Este projeto tem como intuito a criação de um repositório de arquivos PDF's de anais referentes a eventos do curso de Análise e Desenvolvimento de Sistemas.</p>

![Esboço do Site](/assets/scheme/front-end_anais_estacio.jpeg)

## Tecnologias

- PHP para o Back-end
- Apache HTTP Server como servidor
- MYSQL como SGBD

## Nota
- Este projeto não usa nenhum Design Pattern definido, prefirimos organizar do jeito que pensamos que o projeto exigia.
- Este projeto não se preocupa, a priori, das boas práticas do Clean Code.

---

# Checklist

## Database
- Criar DER (1) [x] 

## API
- Criar a API do painel (1) []
- Criar a API do login/signin (2) []

## AJAX
- Criar o AJAX da Home Page (1) []
- Criar o AJAX dos filtros do painel (3) []

## Front-end
- Criar o front-end do login/signin (2) []
- Criar o front-end da Home Page (1) []
- Criar o modal de informações do anais na Home Page (2) []
- Criar o front-end do painel (1) []
    - Criar modal do upload de anais (2) []

## Feature
- PDF Viewer (3) []

---

# Níveis de Prioridade
- 1. Alta (Urgente)
- 2. Média (Não urgente)
- 3. Baixa (Opcional)

---

# Build

## BD Login/Signin
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
