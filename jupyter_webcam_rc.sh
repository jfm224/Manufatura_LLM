#!/bin/sh

# PROVIDE: jupyter
# REQUIRE: DAEMON
# KEYWORD: shutdown

. /etc/rc.subr

name="jupyter"
rcvar=jupyter_enable

load_rc_config $name

: ${jupyter_enable:="NO"}
: ${jupyter_user:="root"}
: ${jupyter_dir:="/opt/WebFreeCAD"}
: ${jupyter_cmd:="jupyter notebook --ip=0.0.0.0 --port=8888 --allow-root"}

pidfile="/var/run/${name}.pid"
logfile="/var/log/${name}.log"

start_cmd="${name}_start"
stop_cmd=":"

jupyter_start() {
    echo "Starting Jupyter Notebook..."
    cd "${jupyter_dir}" || return 1
    /usr/sbin/daemon -p ${pidfile} -o ${logfile} -u ${jupyter_user}         /usr/local/bin/${jupyter_cmd}
}

run_rc_command "$1"
