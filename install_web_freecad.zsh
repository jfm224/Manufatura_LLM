#!/bin/zsh

# Variáveis
JAIL_NAME="webcam"
JAIL_IP="192.168.0.102"

echo "==> Criando jail: $JAIL_NAME"
ezjail-admin create -f default $JAIL_NAME $JAIL_IP
ezjail-admin start $JAIL_NAME

echo "==> Instalando pacotes principais..."
jexec $JAIL_NAME /bin/sh <<EOF
pkg update
pkg install -y python3 py39-pip git wget curl cmake gcc \
    qt5-core qt5-gui qt5-widgets qt5-opengl qt5-network \
    py39-numpy py39-pyqt5 py39-pyside2 py39-matplotlib \
    freecad jupyterlab

ln -sf /usr/local/bin/python3 /usr/local/bin/python
ln -sf /usr/local/bin/pip-3.9 /usr/local/bin/pip

pip install jupyterlab numpy matplotlib pyvista

mkdir -p /opt && cd /opt
git clone https://github.com/yorikvanhavre/WebFreeCAD.git

echo "
Para iniciar o WebFreeCAD, use:
cd /opt/WebFreeCAD
jupyter notebook --ip=0.0.0.0 --port=8888 --allow-root
"
EOF

echo "==> Instalação concluída na jail: $JAIL_NAME"
