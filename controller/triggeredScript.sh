#!/bin/bash


SOURCE=$(python source.py < source.txt)
echo "source:" $SOURCE

DESTINATION=$(python algo.py < candidateVMs.txt)
echo "destination:" $DESTINATION

echo "export SOURCE=${SOURCE}" > setVariables.sh
echo "export DESTINATION=${DESTINATION}" >> setVariables.sh
echo "export COMPRESSEDFILE=apacheGENI.tgz" >> setVariables.sh

bash controllerExecute.sh
