"""
Script exemplo para carregar regras OWL e aplicar inferência
Requisitos:
    pip install owlready2
"""

from owlready2 import *

# Carrega ontologia (modifique o caminho conforme necessário)
onto = get_ontology("file://machining_rules.ttl").load()

# Criando um exemplo de instância
with onto:
    class Peça(Thing): pass
    class temMaterial(DataProperty): domain = [Peça]; range = [str]
    class temTolerancia(DataProperty): domain = [Peça]; range = [float]
    class podeUsarFerramenta(ObjectProperty): domain = [Peça]; range = [Thing]

    p1 = Peça("peca_inconel")
    p1.temMaterial = "Inconel 718"
    p1.temTolerancia = 0.05

    # Realiza raciocínio (usando HermiT se instalado via Java)
    sync_reasoner()

# Verifica inferências
for peca in onto.Peça.instances():
    print(f"Peça: {peca.name}")
    for f in peca.podeUsarFerramenta:
        print(f"  Pode usar ferramenta: {f.name}")
