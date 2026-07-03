from fastapi import APIRouter, HTTPException
from pydantic import BaseModel
from typing import List, Optional

router = APIRouter()

class Order(BaseModel):
    order_id: int
    customer_name: str
    item: str
    quantity: int
    price: float

class OrderCreate(BaseModel):
    customer_name: str
    item: str
    quantity: int
    price: float

# In-memory store
orders_db = [
    {"order_id": 1, "customer_name": "Alice", "item": "Laptop", "quantity": 1, "price": 1500.00},
    {"order_id": 2, "customer_name": "Bob", "item": "Smartphone", "quantity": 2, "price": 999.99},
    {"order_id": 3, "customer_name": "Charlie", "item": "Headphones", "quantity": 1, "price": 199.99},
    {"order_id": 4, "customer_name": "Diana", "item": "Monitor", "quantity": 2, "price": 250.00},
    {"order_id": 5, "customer_name": "Eve", "item": "Keyboard", "quantity": 1, "price": 79.99},
]
_next_id = 6

@router.get("/orders", response_model=List[Order])
def get_orders():
    return orders_db

@router.get("/orders/{order_id}", response_model=Order)
def get_order(order_id: int):
    for o in orders_db:
        if o["order_id"] == order_id:
            return o
    raise HTTPException(404, "Order not found")

@router.post("/orders", response_model=Order, status_code=201)
def create_order(order: OrderCreate):
    global _next_id
    new = {"order_id": _next_id, **order.model_dump()}
    orders_db.append(new)
    _next_id += 1
    return new

@router.put("/orders/{order_id}", response_model=Order)
def update_order(order_id: int, order: OrderCreate):
    for i, o in enumerate(orders_db):
        if o["order_id"] == order_id:
            orders_db[i] = {"order_id": order_id, **order.model_dump()}
            return orders_db[i]
    raise HTTPException(404, "Order not found")

@router.delete("/orders/{order_id}")
def delete_order(order_id: int):
    for i, o in enumerate(orders_db):
        if o["order_id"] == order_id:
            orders_db.pop(i)
            return {"message": "Order deleted"}
    raise HTTPException(404, "Order not found")
