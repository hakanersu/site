{{--
title: Validating turkish identification number
author: xuma
date: 19.09.2021
summary: Different approach to validate turkish identification number.
tags: php, validation, go, rust
--}}

### What we are doing?

Turkish Identification Number is a unique number that is assigned to every citizen of Turkey. We will try to validate turkish identification number with different approach than most of the examples you can find.

If you want to just see the code you can skip [here](#:~:text=A%20different%20approach).

### Algorithm

Turkish identification number is consisting of 11 digits. Last two digits are the verification digits. For calculating 10th digit we need to get sum of  1st, 3rd, 5th, 7th and 9th digits and multiple with `7` and lets call it `first part` than we need to get sum of 2nd, 4th, 6th and 8th digits and lets call it `second part`. Than we need to substract `second part` from `first part` and than when we divide it to 10 and it will give us 10th digit.

If we want to show this as formulate;

```digit_ten = ((1st + 3rd + 5th + 7th + 9th)*7 - (2nd + 4th + 6th + 8th)) / 10```

Digit eleven is simpler than 10th digit. We just need to sum of 1st, 2nd, 3rd, 4th, 5th, 6th, 7th, 8th, 9th and 10th than we just need to divide 10 and it will give us 11th digit. If we want to formulate;

```digit_eleven = (1st + 2nd+ 3rd+ 4th+ 5th+ 6th+ 7th+ 8th+ 9th + 10th) / 10```

Than we have some rules;

* It can't be start with 0.
* Digits can't be same.

### Regular approach

This is exapmle pulled from here; https://github.com/epigra/tckimlik/blob/master/src/TcKimlik.php which is very simple and effective approach. You can find similar approaches from different languages.

```php
public static function verify($input)
{
    $tcno = $input;
    if (is_array($input) && !empty($input['tcno'])) {
        $tcno = $input['tcno'];
    }

    if (is_array($tcno)) {
        $inputKeys = array_keys($tcno);
        $tcno = $input[$inputKeys[0]];
    }

    if (!preg_match('/^[1-9]{1}[0-9]{9}[0,2,4,6,8]{1}$/', $tcno)) {
        return false;
    }

    $odd = $tcno[0] + $tcno[2] + $tcno[4] + $tcno[6] + $tcno[8];
    $even = $tcno[1] + $tcno[3] + $tcno[5] + $tcno[7];
    $digit10 = ($odd * 7 - $even) % 10;
    $total = ($odd + $even + $tcno[9]) % 10;

    if ($digit10 != $tcno[9] ||  $total != $tcno[10]) {
        return false;
    }

    return true;
}
```

### [A different approach](#different-approach)

Final code down below;

```php
function validateTcKimlikNo($number) {
    if (count(array_unique(array_slice(str_split($number),0,10))) === 1) {
        return false;
    }
    $initial = array_slice(str_split($number), 0, 9);
    $result = array_intersect_key($initial, array_flip(range(0, 9, 2)));
    array_push($initial, (array_sum($result) * 7 - array_sum(array_diff_key($initial, $result))) %10);
    array_push($initial, array_sum($initial) % 10);
    return (int)implode($initial) === $number;
}
```

Lets examine code and lets start with this part;

```php
if (count(array_unique(array_slice(str_split($number),0,10))) === 1) {
    return false;
}
```
In this part we will examine given id number is repeated numbers like `11111111111` if its the case it can't be valid.

`str_split` splitting string to an array. And than we take first 10 digits with `array_slice(str_split($number),0,10)` than we call `array_unique` function which it will give us unique values. if id number consists all same values unique returns only one value.

```php
$initial = array_slice(str_split($number), 0, 9);
$result = array_intersect_key($initial, array_flip(range(0, 9, 2)));
```

`$initial` value same as first part it will convert string to array.

In `$result` variable `range(0, 9, 2)` generates even number between 0 and 9. With `array_flip` we are flipping keys and values. If our id number is `58340649694`, before flip our array is;

```php
array:5 [
    0 => 0
    1 => 2
    2 => 4
    3 => 6
    4 => 8
]
```

And after flip;

```php
array:5 [
    0 => 0
    2 => 1
    4 => 2
    6 => 3
    8 => 4
]
```

With `array_intersect_key` we can get even digits from id number. In our case `$result` will be;

```php
array:5 [
    0 => "5"
    2 => "3"
    4 => "0"
    6 => "4"
    8 => "6"
]
```

```php
array_push($initial, (array_sum($result) * 7 - array_sum(array_diff_key($initial, $result))) %10);
```
In this part we will push first part of the algorithm to first 9 digits of id number.

```php
array_push($initial, array_sum($initial) % 10);
```
We are calculating 11th digit and push it to `$initial` array.

```php
return (int)implode($initial) === $number;
```

Finally we are imploding  `$initial` array and checking is `$initial` is equal to given `$number` variable.

### Different languages

There is a lot of libraries that validates turkish id numbers but i also created validation script for `go` and `rust`

[Go script](https://github.com/hakanersu/tcvalidate)

```go
package validatetc

import (
    "strconv"
)

func Validate(tcnumber string) bool {

    runes := []rune(tcnumber)

    if isSame(runes) {
        return false
    }

    if len(runes) != 11 {
        return false
    }

    odd, even, sum, rebuild := 0, 0, 0, ""

    for i := 0; i < len(runes)-2; i++ {

        a, _ := strconv.Atoi(string(runes[i]))

        if string(runes[0]) == "0" {
            return false
        }

        if (i+1)%2 == 0 {
            odd += a
        } else {
            even += a
        }

        rebuild += string(runes[i])

        sum += a
    }

    ten := (even*7 - odd) % 10

    indexTen, _ := strconv.Atoi(string(runes[9]))

    eleven := (sum + indexTen) % 10

    build := string(rebuild) + strconv.Itoa(ten) + strconv.Itoa(eleven)

    if build == tcnumber {
        return true
    }

    return false
}

func isSame(a []rune) bool {
    b := a[0:10]
    for i := 1; i < len(b); i++ {
        if b[i] != b[0] {
            return false
        }
    }
    return true
}

```

[Rust script](https://github.com/hakanersu/tc_kimlik)

```rust
use rand::Rng;

pub fn validate(tc: &String) -> bool {
    let parts = number_to_vec(&tc);

    if parts.len() < 11 {
        return false
    }

    let even: u32 = parts.iter().take(9).step_by(2).sum();
    let odd: u32 = parts[1..9].iter().step_by(2).sum();

    let ten: u32 = ( even * 7 - odd) % 10;

    if parts.get(9).is_none() || parts[9] != ten {
        return false
    }

    let eleven: u32 = parts[0..10].iter().sum::<u32>() % 10;

    if parts.get(10).is_none() || parts[10] != eleven {
        return false
    }

    true
}
pub fn generate() -> String {
    let mut rng = rand::thread_rng();
    let random: u32 = rng.gen_range(100000000, 999999999);
    let parts = number_to_vec(&random.to_string());
    let even: u32 = parts.iter().take(9).step_by(2).sum();
    let odd: u32 = parts[1..9].iter().step_by(2).sum();
    let ten: u32 = ( even * 7 - odd) % 10;
    let new_number = format!("{}{}", random, ten);
    let new_parts = number_to_vec(&new_number);
    let eleven: u32 = new_parts[0..10].iter().sum::<u32>() % 10;
    return format!("{}{}{}", random, ten, eleven)
}

fn number_to_vec(n: &String) -> Vec<u32> {
    n.trim().chars()
    .map(|c| c.to_digit(10).unwrap())
    .collect()
}
```
