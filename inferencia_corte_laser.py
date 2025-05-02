# inferencia_corte_laser.py - Inferência de restrições técnicas com OWL
from owlready2 import get_ontology, sync_reasoner

onto = get_ontology("file://manufatura.owl").load()
with onto:
    sync_reasoner()

def verificar_viabilidade(material, espessura, potencia):
    for p in onto.Processo:
        if (p.material == material and p.espessura_maxima >= espessura and p.potencia_minima <= potencia):
            return f"Processo viável: {p.name}"
    return "Nenhum processo viável encontrado."