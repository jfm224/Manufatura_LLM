# Projeto de Triagem Técnica para Manufatura

Este projeto permite automatizar a triagem de viabilidade técnica para processos como corte a laser,
utilizando formulários web, análise de arquivos DXF e inferência semântica via OWL.
Está dividido em três servidores jails: 1) llm; 2) webFreecad; 3) pretriagem de corte laser e inferência;
## Componentes
- `laser_custo.py`: calcula o comprimento do corte a partir de um DXF
- `inferencia_corte_laser.py`: aplica inferência OWL (usando owlready2)
- `estimativa_corte_dxf.php`: formulário web para envio e retorno de custo estimado
- `manufatura.owl`: ontologia de exemplo com regras básicas de corte a laser

## Requisitos
- freebsd com jails
- 3 jails 
- Python 3 com `owlready2` e `ezdxf`
- Servidor Apache + PHP
- Arquivos DXF simples (polilinhas abertas ou fechadas)# Manufatura_LLM
