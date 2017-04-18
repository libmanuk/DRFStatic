#!/bin/bash
start='date +%s'
bash 1800s_process.sh
echo 1800s processed successfully!
bash 1900s_process.sh
echo 1900s processed successfully!
bash 1910s_process.sh
echo 1910s processed successfully!
bash 1920s_process.sh
echo 1920s processed successfully!
bash 1930s_process.sh
echo 1930s processed successfully!
bash 1940s_process.sh
echo 1940s processed successfully!
bash 1950s_process.sh
echo 1950s processed successfully!
echo All Daily Racing Form articles have been generated as HTML pages.
end='date +%s'
runtime=$((end-start))
echo $runtime
