CREATE TRIGGER reduce_product_stock
AFTER INSERT ON transactions
FOR EACH ROW
BEGIN
    UPDATE products
    SET qty = qty - NEW.qty
    WHERE id = NEW.product_id;
END;