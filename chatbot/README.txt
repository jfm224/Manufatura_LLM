# Chatbot Técnico para Triagem de Manufatura

Este pacote contém uma interface web em PHP para enviar prompts técnicos a um LLM rodando localmente (ex: via Ollama).

## Conteúdo:
- index.html — Formulário de entrada (material, lote, tolerância)
- chatbot.php — Script PHP que envia prompt para o modelo LLM
- Exemplo de prompt usado para triagem

## Requisitos (webjail):
- Apache 2.4
- PHP 8.0 ou superior
- cURL habilitado

## Requisitos (llmjail):
- Ollama instalado
- Modelo carregado: `gemma:2b` ou outro compatível

## Comunicação entre jails:
- Certifique-se de que o IP da jail LLM (ex: 192.168.0.101) seja acessível da jail web.

