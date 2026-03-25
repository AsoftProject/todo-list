# 📘 Documentação da Aplicação Todo List

## 1. 📌 Visão Geral

A aplicação **Todo List** é um sistema de gestão de tarefas que permite aos usuários organizar suas atividades diárias de forma eficiente.

O sistema oferece funcionalidades completas de criação, edição, exclusão e filtragem de tarefas, além de suporte a subtarefas e autenticação de usuários.

---

## 2. 🎯 Objetivo

Permitir que usuários:

- Organizem tarefas pessoais ou profissionais
- Acompanhem o progresso das tarefas
- Dividam tarefas complexas em subtarefas
- Gerenciem prazos e estados

---

## 3. 👤 Autenticação

### 3.1 Cadastro

O usuário poderá criar uma conta informando:

- Nome
- Email
- Senha

### 3.2 Login

O usuário poderá acessar o sistema com:

- Email
- Senha

### 3.3 Segurança

- Senhas devem ser armazenadas de forma criptografada

---

## 4. 📋 Funcionalidades

### 4.1 Tarefas

#### 4.1.1 Criar Tarefa

Campos:

- Título (obrigatório)
- Descrição (opcional)
- Data de criação (automático)
- Data de previsão de término (opcional)
- Estado (pendente, em progresso, concluída)

#### 4.1.2 Listar Tarefas

O usuário poderá visualizar todas as tarefas criadas.

#### 4.1.3 Editar Tarefa

Campos editáveis:

- Título
- Data de previsão de término
- Estado

#### 4.1.4 Excluir Tarefa

- Remove permanentemente a tarefa
- Deve também remover suas subtarefas associadas

---

### 4.2 Subtarefas

#### 4.2.1 Criar Subtarefa

Campos:

- Título
- Estado (pendente ou concluída)
- ID da tarefa associada

#### 4.2.2 Editar Subtarefa

Campos editáveis:

- Estado

#### 4.2.3 Excluir Subtarefa

- Remove a subtarefa da tarefa associada

---

### 4.3 Filtros de Tarefas

O sistema deve permitir filtrar tarefas por:

- Nome (título)
- Data de criação
- Estado
- Data de previsão de término

---

## 5. 🗄️ Modelo de Dados

### 5.1 Usuário

| Campo | Tipo   | Descrição           |
| ----- | ------ | ------------------- |
| Id    | int    | Identificador único |
| Nome  | string | Nome do usuário     |
| Email | string | Email único         |
| Senha | string | Senha criptografada |

### 5.2 Tarefa

| Campo        | Tipo     | Descrição        |
| ------------ | -------- | ---------------- |
| Id           | int      | Identificador    |
| Titulo       | string   | Nome da tarefa   |
| Descricao    | string   | Descrição        |
| DataCriacao  | datetime | Data de criação  |
| DataPrevista | datetime | Prazo            |
| Estado       | enum     | Status da tarefa |
| UsuarioId    | Guid     | Dono da tarefa   |

### 5.3 Subtarefa

| Campo    | Tipo   | Descrição        |
| -------- | ------ | ---------------- |
| Id       | int    | Identificador    |
| Titulo   | string | Nome             |
| Estado   | enum   | Status           |
| TarefaId | int    | Tarefa associada |

---

## 6. 🔄 Estados

### 6.1 Estado da Tarefa

- Pendente
- Em Progresso
- Concluída

### 6.2 Estado da Subtarefa

- Pendente
- Concluída

---

## 7. 🔗 ROTAS&#x20;

### 7.1 Autenticação

- POST /api/auth/register
- POST /api/auth/login

### 7.2 Tarefas

- GET /api/tasks
- POST /api/tasks
- PUT /api/tasks/{id}
- DELETE /api/tasks/{id}

### 7.3 Filtros

- GET /api/tasks?titulo=&estado=&dataCriacao=&dataPrevista=

### 7.4 Subtarefas

- POST /api/tasks/{taskId}/subtasks
- PUT /api/subtasks/{id}
- DELETE /api/subtasks/{id}

---

## 8. ⚙️ Regras de Negócio

- Um usuário só pode ver suas próprias tarefas
- Ao excluir uma tarefa, suas subtarefas devem ser removidas
- Subtarefas devem estar sempre vinculadas a uma tarefa
- Uma tarefa pode ter múltiplas subtarefas

---

## 9. 🧪 Possíveis Melhorias Futuras

- Notificações de prazo
- Prioridade de tarefas
- Compartilhamento de tarefas
- Anexos em tarefas

---

## 11. 📌 Conclusão

A aplicação Todo List fornece uma base sólida para gestão de tarefas, podendo ser expandida para cenários mais complexos como colaboração em equipe e produtividade avançada.

