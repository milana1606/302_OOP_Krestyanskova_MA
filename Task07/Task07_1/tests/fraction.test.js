import { createFraction } from "../fraction.js";

describe("Дробь с использованием литералов объектов", () => {
    test("создает и нормализует дроби", () => {
        const frac1 = createFraction(6, 8);
        expect(frac1.getNumer()).toBe(3);
        expect(frac1.getDenom()).toBe(4);

        const frac2 = createFraction(-6, 8);
        expect(frac2.getNumer()).toBe(-3);
        expect(frac2.getDenom()).toBe(4);

        const frac3 = createFraction(6, -8);
        expect(frac3.getNumer()).toBe(-3);
        expect(frac3.getDenom()).toBe(4);
    });

    test("складывает дроби", () => {
        const frac1 = createFraction(1, 2);
        const frac2 = createFraction(1, 3);
        const sum = frac1.add(frac2);
        expect(sum.getNumer()).toBe(5);
        expect(sum.getDenom()).toBe(6);
    });

    test("вычитает дроби", () => {
        const frac1 = createFraction(1, 2);
        const frac2 = createFraction(1, 3);
        const diff = frac1.sub(frac2);
        expect(diff.getNumer()).toBe(1);
        expect(diff.getDenom()).toBe(6);
    });

    test("toString форматирует корректно", () => {
        expect(createFraction(3, 4).toString()).toBe("3/4");
        expect(createFraction(-3, 4).toString()).toBe("-3/4");
        expect(createFraction(5, 2).toString()).toBe("2'1/2");
        expect(createFraction(-5, 2).toString()).toBe("-2'1/2");
        expect(createFraction(4, 2).toString()).toBe("2");
        expect(createFraction(0, 5).toString()).toBe("0");
    });
});