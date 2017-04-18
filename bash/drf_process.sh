#!/bin/bash
start1800s='date +%s'
bash 1800s_process.sh
echo 1800s processed successfully!
end1800s='date +%s'
runtime1800s=$((end-start))
echo processing time for 1800s $runtime1800s
start1900s='date +%s'
bash 1900s_process.sh
echo 1900s processed successfully!
end1900s='date +%s'
runtime1900s=$((end-start))
echo processing time for 1900s $runtime1900s
start1910s='date +%s'
bash 1910s_process.sh
echo 1910s processed successfully!
end1910s='date +%s'
runtime1910s=$((end-start))
echo processing time for 1910s $runtime1910s
start1920s='date +%s'
bash 1920s_process.sh
echo 1920s processed successfully!
end1920s='date +%s'
runtime1920s=$((end-start))
echo processing time for 1920s $runtime1920s
start1930s='date +%s'
bash 1930s_process.sh
echo 1930s processed successfully!
end1930s='date +%s'
runtime1930s=$((end-start))
echo processing time for 1930s $runtime1930s
start1940s='date +%s'
bash 1940s_process.sh
echo 1940s processed successfully!
end1940s='date +%s'
runtime1940s=$((end-start))
echo processing time for 1940s $runtime1940s
start1950s='date +%s'
bash 1950s_process.sh
echo 1950s processed successfully!
echo All Daily Racing Form articles have been generated as HTML pages.
end1950s='date +%s'
runtime1950s=$((end-start))
echo processing time for 1950s $runtime19150s
runtime=$runtime1800s + $runtime1900s + $runtime1910s + $runtime1920s + $runtime1930s + $runtime1940s + $runtime1950s
echo total processing time $runtime
