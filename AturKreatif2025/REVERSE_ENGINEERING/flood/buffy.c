#include <stdio.h>

void win() {
    printf("🎉 Since you talk a lot here's the FLAG: AKCTF25{th1s_h4pp3n_wh3n_U_0verSp1ll}\n");
}

int main() {
    char name[32];        
    int unlocked = 0;

    printf("Sir! Can i have your nameeee? ");
    fgets(name, 64, stdin);  

    if (unlocked != 0) {
        win();
    } else {
        printf("Try again Sir... 🤭\n");
    }

    return 0;
}
