package Ruby.test;

public class Task {
    public static String sequence(String num) {
        StringBuilder res = new StringBuilder();

        char repeat = num.charAt(0);
        num = num.substring(1) + " ";
        int times = 1;
        char[] number = num.toCharArray();

        for (char curr : number) {
            if (curr != repeat) {
                res.append(times + "" + repeat);
                times = 1;
                repeat = curr;
            } else {
                times += 1;
            }
        }
        return res.toString();
    }

    public static void main(String[] args) {
        String num = "1";

        for (int i = 1; i <= 10; i++) {
            System.out.println(num);
            num = sequence(num);
        }
    }
}
