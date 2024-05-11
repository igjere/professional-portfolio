using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class scorpionMove : MonoBehaviour
{
    public LevelManager levelMan;
    public float moveSpeed = 2.5f;
    public float changeDirectionInterval = 4f;
    private Rigidbody2D rb;
    private Vector2 movement;
    private float directionTimer = 0f;

    void Start()
    {
        rb = GetComponent<Rigidbody2D>();
        ChangeDirection();
    }

    void Update()
    {
        directionTimer += Time.deltaTime;

        if (directionTimer >= changeDirectionInterval)
        {
            directionTimer = 0f;
            ChangeDirection();
        }
    }

    void FixedUpdate()
    {
        rb.velocity = movement * moveSpeed;
        RotateInMovementDirection();
    }

    private void ChangeDirection()
    {
        movement = Vector2.right;
    }

    private void OnCollisionEnter2D(Collision2D collision)
    {
        movement.x *= -1;
        rb.velocity = movement * moveSpeed;
    }

    private void RotateInMovementDirection()
    {
        if (movement.x > 0)
        {
            transform.rotation = Quaternion.Euler(0, 0, 0);
        }
        else
        {
            transform.rotation = Quaternion.Euler(0, 0, 180);
        }
    }

    private void OnMouseDown()
    {
        levelMan.ScorpionClicked();
        Destroy(gameObject);
    }
}
