package main

import "testing"

var (
	cart  Cart
	test1 = map[string]int{
		"Baju Merah Mantap": 2,
		"Singlet Hijau":     1,
	}
)

func TestCase1(t *testing.T) {

	cart.data = map[string]int{}

	cart.addProduct("Baju Merah Mantap", 1)
	cart.addProduct("Baju Merah Mantap", 1)
	cart.addProduct("Bukuku", 3)
	cart.removeProduct("Bukuku")
	cart.addProduct("Singlet Hijau", 1)
	cart.removeProduct("ProdukBohongan")

	for key, value := range cart.data {
		t.Logf("%s (%d)\n", key, value)
	}

	for key, value := range cart.data {
		if test1[key] != value {
			t.Errorf("WRONG! Correct value: %s (%d)", key, test1[key])
		}
	}
}
