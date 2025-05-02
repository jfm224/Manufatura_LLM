# laser_custo.py - Calcula comprimento total de corte a partir de arquivo DXF
import ezdxf

def calcular_comprimento(dxf_path):
    doc = ezdxf.readfile(dxf_path)
    msp = doc.modelspace()
    comprimento = sum(entity.length() for entity in msp if hasattr(entity, "length"))
    return comprimento