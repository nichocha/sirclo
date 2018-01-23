package main

import "fmt"

func fivaa(count int) {

	fmt.Printf("fivaa(%d)\n\n", count)

	for row := count; row > 0; row-- {

		for prefix := 0; prefix < 2; prefix++ {
			fmt.Printf("%d", row-1)
		}

		for postfix := 0; postfix < row; postfix++ {
			fmt.Printf("%d", row+1)
		}

		fmt.Printf("\n")
	}

}

func main() {
	fivaa(5)
}
