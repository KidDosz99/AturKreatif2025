#include <stdio.h>
#include <string.h>

void get_flag(char *buf) {
    unsigned char encoded[] = {
        0x53, 0x59, 0x51, 0x46, 0x54, 0x20, 0x27, 0x69,
        0x47, 0x4d, 0x79, 0x7c, 0x22, 0x65, 0x4d, 0x7a,
        0x22, 0x65, 0x4d, 0x20, 0x4d, 0x60, 0x21, 0x64,
        0x77, 0x60, 0x61, 0x21, 0x4d, 0x7f, 0x21, 0x6f,
        0x00
    };

    for (int i = 0; encoded[i] != 0; i++) {
        buf[i] = encoded[i] ^ 0x12;
    }
    buf[32] = '\0';  
}

int main() {
    char input[100];
    char flag[100];

    printf("=== Welcome to ExorCISE ===\n");
    printf("Prove your power, Reverser!\n");
    printf("Enter your flag here >> ");
    scanf("%99s", input);

    get_flag(flag);

    if (strcmp(input, flag) == 0) {
        printf("💡 Nice job! You cracked ExorCISE.\n");
    } else {
        printf("❌ Wrong flag, Mr. Hacker 😈\n");
    }

    return 0;
}
