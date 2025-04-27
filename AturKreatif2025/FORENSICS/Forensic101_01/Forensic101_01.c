#include <stdio.h>
#include <string.h>

int main() {
    char input[100];
    char password[9];
    char flag[65];

    // Build password dynamically
    password[0] = 'c';
    password[1] = 'h';
    password[2] = 'a';
    password[3] = 'e';
    password[4] = 'n';
    password[5] = 'g';
    password[6] = 'z';
    password[7] = 'y';
    password[8] = '\0';

    // Build flag dynamically
    flag[0] = 'f';
    flag[1] = 'b';
    flag[2] = '5';
    flag[3] = '5';
    flag[4] = '4';
    flag[5] = '1';
    flag[6] = '4';
    flag[7] = '8';
    flag[8] = '4';
    flag[9] = '8';
    flag[10] = '2';
    flag[11] = '8';
    flag[12] = '1';
    flag[13] = 'f';
    flag[14] = '8';
    flag[15] = '0';
    flag[16] = '4';
    flag[17] = '8';
    flag[18] = '5';
    flag[19] = '8';
    flag[20] = 'c';
    flag[21] = 'e';
    flag[22] = '1';
    flag[23] = '8';
    flag[24] = '8';
    flag[25] = 'c';
    flag[26] = '3';
    flag[27] = 'd';
    flag[28] = 'c';
    flag[29] = '6';
    flag[30] = '5';
    flag[31] = '9';
    flag[32] = 'd';
    flag[33] = '1';
    flag[34] = '2';
    flag[35] = '9';
    flag[36] = 'e';
    flag[37] = '2';
    flag[38] = '8';
    flag[39] = '3';
    flag[40] = 'b';
    flag[41] = 'd';
    flag[42] = '6';
    flag[43] = '2';
    flag[44] = 'd';
    flag[45] = '5';
    flag[46] = '8';
    flag[47] = 'd';
    flag[48] = '3';
    flag[49] = '4';
    flag[50] = 'f';
    flag[51] = '6';
    flag[52] = 'e';
    flag[53] = '6';
    flag[54] = 'f';
    flag[55] = '5';
    flag[56] = '6';
    flag[57] = '8';
    flag[58] = 'f';
    flag[59] = 'e';
    flag[60] = 'a';
    flag[61] = 'b';
    flag[62] = '3';
    flag[63] = '7';
    flag[64] = '\0';

    printf("Enter the password (hint: challenge creator's name): ");
    scanf("%99s", input);

    if (strcmp(input, password) == 0) {
        printf("Correct! Here is your 'bendera':\n");
        printf("%s\n", flag);
    } else {
        printf("Wrong password. Try again.\n");
    }

    return 0;
}
