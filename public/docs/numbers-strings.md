# Numbers & Strings

## GET `/number`

Generates a random integer with `$length` amount of digits.

### Parameters

-   `length` (`int`) - Sets the amount of digits to return. (**Default:** `null` **Min:** `1` **Max:** `9`)

#### Example

> GET `https://fakerapi.com/v1/number?length=3`

#### Response

```int
421
```

## GET `/number/digit`

Similar to [`/number`](#get-number), this generates a random integer from `0` to `9`, and adds new parameters.

### Parameters

-   `exclude` (`int`) - Number to exclude. (**Default:** `null` **Min:** `1` **Max:** `9`)
-   `notNull` (`bool`) - If set to `1`, the number generated will not be a `null` (`0`) value. (**Default:** `0`)

#### Example

> GET `https://fakerapi.com/v1/number/digit?exclude=2&notNull=1`

#### Response

```int
5
```

## GET `/number/float`

Generates a random float.

### Parameters

-   `decimals` (`int`) - Sets the number of decimal points. (**Default:** `null` **Min:** `1` **Max:** `9`)

#### Example

> GET `https://fakerapi.com/v1/number/digit?exclude=2&notNull=1`

#### Response

```int
5
```
