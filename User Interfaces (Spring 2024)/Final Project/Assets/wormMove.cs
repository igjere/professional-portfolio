using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class wormMove : MonoBehaviour
{
    public LevelManager levelMan;
    public float moveSpeed = 1.5f;
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
    }

    private void RotateInMovementDirection()
    {
        if (movement.x > 0)
        {
            transform.localScale = new Vector3(Mathf.Abs(transform.localScale.x), transform.localScale.y, transform.localScale.z);
        }
        else
        {
            transform.localScale = new Vector3(-Mathf.Abs(transform.localScale.x), transform.localScale.y, transform.localScale.z);
        }
    }

    private void OnMouseDown()
    {
        levelMan.TermiteClicked();
        Destroy(gameObject);
    }
}
