#!/bin/sh

git fetch --quiet
UPSTREAM=${1:-'@{u}'}
LOCAL=$(git rev-parse @)
REMOTE=$(git rev-parse "$UPSTREAM")
BASE=$(git merge-base @ "$UPSTREAM")

ask() {
    local prompt default reply

    if [ "${2:-}" = "Y" ]; then
        prompt="Y/n"
        default=Y
    elif [ "${2:-}" = "N" ]; then
        prompt="y/N"
        default=N
    else
        prompt="y/n"
        default=
    fi

    while true; do

        # Ask the question (not using "read -p" as it uses stderr not stdout)
        echo -n "$1 [$prompt] "

        # Read the answer (use /dev/tty in case stdin is redirected from somewhere else)
        read reply </dev/tty

        # Default?
        if [ -z "$reply" ]; then
            reply=$default
        fi

        # Check if the reply is valid
        case "$reply" in
            Y*|y*) return 0 ;;
            N*|n*) return 1 ;;
        esac

    done
}

if [ $LOCAL = $REMOTE ]; then
    	echo "----------Up-to-date----------";
elif [ $LOCAL = $BASE ]; then
    	echo "----------Need to pull----------";
	#Prompt if user wants to pull
    	if ask "Do you want to pull ?"; then
    		echo "Pulling...";
		git pull
	else
    		echo "Ignoring pull";
	fi
fi
