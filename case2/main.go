package main

import "fmt"

type Cart struct {
	data map[string]int
}

func (cart Cart) addProduct(productCode string, quantity int) {
	cart.data[productCode] += quantity
}

func (cart Cart) removeProduct(productCode string) {
	var _, isExist = cart.data[productCode]

	//If Key Exist, then Remove from Map
	if isExist {
		delete(cart.data, productCode)
	}
}

func (cart Cart) showCart() {

	for key, value := range cart.data {
		fmt.Printf("%s (%d)\n", key, value)
	}

}

// func main() {
// 	var cart Cart
// 	cart.data = map[string]int{}

// 	cart.addProduct("Baju Merah Mantap", 1)
// 	cart.addProduct("Baju Merah Mantap", 1)
// 	cart.addProduct("Bukuku", 3)
// 	cart.removeProduct("Bukuku")
// 	cart.addProduct("Singlet Hijau", 1)
// 	cart.removeProduct("ProdukBohongan")
// 	cart.showCart()
// }
